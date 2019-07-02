<h1>Sender : {{ $data1['name'] }}</h1>


<p><b>Address:</b>  {{ $data1['address'] }}</p>
<p><b>Phone Number:</b>  {{ $data1['phone_number'] }}</p>

<img src="{{ url($data1['photo_path']) }}">
