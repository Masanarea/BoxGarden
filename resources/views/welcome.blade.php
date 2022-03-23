<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    Where is Tokyo Tower ?
    </head>
    <body>
	    <div id="map" style="height:500px">
	    </div>

        <script src="{{ asset('/js/result.js') }}"></script>
         {{-- <script src="{{ mix('js/result.js') }}" defer></script> --}}
        {{-- scr属性でhttps://maps.googleapis.com/maps/api/js を指定
        ?language=ja → 言語を日本語に設定
        &region=JP → 地域を日本に設定
        key=[APIキーをここに入力] → APIキーを設定します。APIキー取得は、後ほど解説します。
        &callback=initMap → APIを読み終わったあとに、initmapというcallback関数を実行します。あとで記述します。
        async defer → 非同期でスクリプトを読み込むために必要です。
        --}}
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ env('GCP_API')}}&callback=initMap" async defer>
	    </script>
    </body>
</html>
