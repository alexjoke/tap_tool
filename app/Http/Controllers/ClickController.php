<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CheckClick;
    use Illuminate\Http\Request;
    use App\Click;
    use App\BadDomain;
    use DataTables;
    use Response;

    class ClickController extends Controller
    {
        /**
         * Get data for click dataTable
         *
         */
        public function getDataTable()
        {
            $clicks = Click::all();
            return DataTables::of($clicks)->make(true);
        }
        
        /**
         * Check for click's unique chain
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function performRedirect(CheckClick $request)
        {
            $referrer = (!is_null($request->server('HTTP_REFERER')) ? $request->server('HTTP_REFERER') : env('APP_URL'));
            $ip = $request->server('REMOTE_ADDR');
            $user_agent = $request->server('HTTP_USER_AGENT');

            $click = Click::where('ip', $ip)
                ->where('user_agent', $user_agent)
                ->where('ref', $referrer)
                ->where('param1', $request->param1)->first();

            if (is_null($click)) {
                return $this->store($request);
            }
            return $this->updateError($click->id);
            
        }

        /**
         * Generate unique ID for click table
         * 
         * @return int
         */
        static private function generateID()
        {
            $number = mt_rand(1000, 9999);
            $click = Click::find($number);
            if (is_null($click)) {
                return $number;
            } else {
                return self::generateID();
            }

        }

        /**
         * Get Country code from user IP
         *
         * @return string
         */
        static private function getCountry($ip)
        {
            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
            $country = $geo['geoplugin_countryCode'];
            return $country;
        }
        
        /**
         * Get Success Page
         *
         */
        public function success($id)
        {
            $click = Click::findOrFail($id);
            return view('pages.success');
        }
        
        /**
         * Store a new click.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            $click = new Click;
            $click->fill($request->all());

            $country = self::getCountry($request->server('REMOTE_ADDR'));
            $click->country = $country;
            $click->ref = (!is_null($request->server('HTTP_REFERER')) ? $request->server('HTTP_REFERER') : env('APP_URL'));
            $click->ip = $request->server('REMOTE_ADDR');
            $click->user_agent = $request->server('HTTP_USER_AGENT');
            $click->id = self::generateID();

            $saved = $click->save();
            if ($saved) {
                $click = Click::all()->sortByDesc('created_at')->first();
                return redirect()->route('redirect.success', $click->id);
            }
        }

        /**
         * Increment error counter
         *
         */
        static private function updateError($id)
        {

            $click = Click::find($id);
            $click->error += 1;

            $check = self::checkBadDomain($click->ref);
            if ($check) {
                $click->bad_domain = 1;
            }
            $click->save();
            return redirect()->route('redirect.error', $click->id);
        }
        
        /**
         * Check if click's ref in bad domain table
         * @param  url
         * @return  bool
         */
        static private function checkBadDomain($url)
        {
            $domains = BadDomain::where('name', $url)->count();
            if($domains==0){
                return false;
            }
            return true;
        }

        /**
         * Get error page
         *
         */
        public function error($id)
        {
            $click = Click::find($id);
            $checkAttr = $click->bad_domain;
            return view('pages.error', compact('checkAttr'));

        }

    }
