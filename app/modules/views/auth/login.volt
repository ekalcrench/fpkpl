{% extends 'layouts/default.volt' %}
{% block content %}

<br><br>
{{ form('auth/login', 'role': 'form', 'class': 'form-horizontal')}}
    <div class="form-group">
        <label class="control-label col-sm-2" for="users">Users:</label>
        <div class="col-sm-10">
            <select class="form-control" name="users">
                <option>Kaprodi</option>
                <option>Dosen</option>
                <option>Mahasiswa</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">NIP/NRP:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="Enter username">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default btn-block">Sign In</button>
        </div>
    </div>
</form>

<a href="/"><button class="btn btn-default btn-block">Back</button></a>

{% endblock %}