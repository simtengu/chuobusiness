
<h5 style="color: black; margin-bottom: 2px;">Click the button below to activate your account</h5>
<a  href="{{ route('account_verification',[$data['email'],$data['code']]) }}" ><button style="background-color: blue;padding: 4px 5px; border-radius: 4px;">click to activate</button></a>
<h5 style="color: black; margin: 3px 1px;">Or copy the link below and open it on your browser</h5>
<a style="color: blue; padding: 5px 3px; border-radius: 4px;" href="{{ route('account_verification',[$data['email'],$data['code']]) }}" >{{ route('account_verification',[$data['email'],$data['code']]) }}</a>

