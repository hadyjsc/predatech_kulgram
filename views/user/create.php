View Create User
<form method="post" action="">
    <input type="text" placeholder="Full Name" name="fname"><br>
    <input type="text" placeholder="User Name" name="uname"><br>
    <input type="password" placeholder="Password" name="password"><br>
    <select placeholder="Select Level" name="level">
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        <option value="member">Member</option>
    </select><br>
    <select placeholder="Select Status" name="status">
        <option value="actived">Actived</option>
        <option value="deactived">Deactived</option>
        <option value="blocked">Blocked</option>
        <option value="deleted">Deleted</option>
    </select><br>
    <button type="submit" name="save">Save</button>
</form>