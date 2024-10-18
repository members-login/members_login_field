# Members: login field

With this extension, users can log in with their email address or username.

See it live [here](https://members-login.dev/login/).

To do this, the attribute ```name``` in the input field must be set to ```name="fields[user-login]"```. Make sure that the attribute ```name``` is set correctly on the pages _log in_, _sign up_ and _forgot password_  for the input field.

Full example:

```
<input type="text" name="fields[user-login]" placeholder="Email or username" autocomplete="username" value="" />
```
