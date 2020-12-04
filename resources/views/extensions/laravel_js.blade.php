
<!-- Scripts -->
<script>
    /*
    |--------------------------------------------------------------------------
    | Laravel Javascript Extensions
    |--------------------------------------------------------------------------
    | Add to view file so it can be pre-process
    | Usage: include('extensions.laravel_js')
    |
    */

    var Laravel = {

        /**
         * Javascript equivalent function of laravel url
         * @param {string} $path
         * @returns {string}
         */
        url : function ($path) {
            var laravel_url_append = '{{url("/")}}'
            return laravel_url_append+"/"+$path;
        },

        /**
         * Javascript equivalent function of laravel csrf_token()
         * @returns {string}
         */
        csrf_token: function () {
            return '{{csrf_token()}}';
        },

        locale: '{{\Illuminate\Support\Facades\App::getLocale()}}',
        localeCommon: JSON.parse('{!! json_encode(Lang::get("Common")) !!}'),

        /**
         * Extract parameter from Query String using Javascript
         * @param sParam
         * @returns {*}
         * @constructor
         */
        getURLParameter: function (sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        },
        dd: function () {
            for (var i = 0; i < arguments.length; ++i)console.log(arguments[i]);
        }
    };

    const Icons = {
        IC_ERROR : "error",
        IC_SUCCESS : "success",
        IC_WARNING : "warning"
    }

    const StatusCodes = {
        SUCCESS : 200,
        BAD_REQUEST : 400,
        UNAUTHORIZED : 401,
        FORBIDDEN : 403,
        UNPROCESSABLE_ENTITY : 422,
    }


</script>