    <div class="chica @if($size=="large") chica-grande @endif">
        <a class="link"
           data-href="http://webcams.cumlouder.com/joinmb/cumlouder/{{$girl->wbmerPermalink}}/?nats={{$natWebcam}}"
           title="Webcam de {{$girl->wbmerNick}}">
            <span class="thumb"><img src="//w0.imgcm.com/modelos/{{$girl->wbmerThumb1}}"
                                     @if($size=="large")width="357" height="307" @else width="175" height="150"
                                     @endif  alt="{{$girl->wbmerNick}}" title="{{$girl->wbmerNick}}"/></span>
            <span class="nombre-chica"> <span class="ico-online"></span>{{$girl->wbmerNick}}</span>
            <span id="favorito" class="ico-favorito"></span>
        </a>
    </div>
