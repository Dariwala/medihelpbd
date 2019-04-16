<h1>Sender : {{ $data1['name'] }}</h1>


<p><b>Email Address:</b>  {{ $data1['email'] }}</p>
<p><b>Subject:</b>  {{ $data1['subject'] }}</p>
<p><b>Message:</b></p> @php echo nl2br($data1['details']); @endphp