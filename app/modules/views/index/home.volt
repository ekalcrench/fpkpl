{% extends 'layouts/default.volt' %}
{% block content %}

<h1 class="text-center">Ekuivalensi</h1>
<h4 class="text-center">Selamat Datang {{ auth['table'] }} {{ auth['id_pengguna'] }} </h4>
<br><br>
<div class="col-lg-12">
   {% if auth['table'] == "Kaprodi" %}
      <a href='{{ url('kaprodi') }}'><button class="btn btn-success btn-block">Dashboard</button></a>
   {% endif %}
   {% if auth['table'] == "Dosen" %}
      <a href='{{ url('dosen') }}'><button class="btn btn-success btn-block">Dashboard</button></a>
   {% endif %}
   {% if auth['table'] == "Mahasiswa" %}
      <a href='{{ url('mahasiswa') }}'><button class="btn btn-success btn-block">Dashboard</button></a>
   {% endif %}
</div>
<br><br><br>
<div class="col-lg-12">
   <a href='{{ url('auth/logout') }}'><button class="btn btn-danger btn-block">Logout</button></a>
</div>

{% endblock %}
