<!DOCTYPE html>
<html>
<head>
    <title>Form data</title>
</head>

<body>
<h2>New message from contact page</h2>
<br/>
<h2>Name: {{ $request->name }}</h2>
<h2>Email: {{ $request->email }}</h2>
<h2>Message:</h2>
<p>{{ $request->message }}</p>

</body>

</html>