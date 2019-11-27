{% extends 'layouts/default.volt' %}
{% block content %}

<h2>Halo Selamat Datang {{ auth['table'] }} {{ auth['id_pengguna'] }} </h2>
<br><br>
<div class="row">
   <div class="col-lg-3">
      <a href='{{ url('auth/logout') }}'><button class="btn btn-danger">Logout</button></a>
   </div>
   <div class="col-lg-3">
      <a href='{{ url('kaprodi') }}'><button class="btn btn-success">Kaprodi</button></a>
   </div>
   <div class="col-lg-3">
      <a href='{{ url('dosen') }}'><button class="btn btn-success">Dosen</button></a>
   </div>
   <div class="col-lg-3">
      <a href='{{ url('mahasiswa') }}'><button class="btn btn-success">Mahasiswa</button></a>
   </div>
</div>
   

{% endblock %}