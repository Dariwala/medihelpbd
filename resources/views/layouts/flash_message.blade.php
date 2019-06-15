@if(Session::has('flash_message'))
	<!--<div class="uk-alert uk-alert-{{session('flash_notification')}}" data-uk-alert>
	    <a href="" class="uk-alert-close uk-close"></a>-->
		<p><b> {{session('flash_message')}} </b></p>
	<!--</div>-->
@endif