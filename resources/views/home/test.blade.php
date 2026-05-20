<!DOCTYPE html>
<html>
<head>
    <title>Test Page</title>
</head>
<body>

<h1>Test Page</h1>

<p>Result: {{ $id + $number }}</p>

<form action="/save" method="POST">
    @csrf
    <input type="text" name="firstname" placeholder="First Name">
    <input type="text" name="lastname" placeholder="Last Name">
    <button type="submit">Send</button>
</form>

</body>
</html>
