{% extends 'layouts/default.volt' %}
{% block content %}
<br><br>
<a href='{{ url('kaprodi/matakuliah') }}'><button class="btn btn-default btn-block">Data Matakuliah</button></a>
<br>
<a href='{{ url('ekuivalensi/beban') }}'><button class="btn btn-default btn-block">Beban Ekuivalensi</button></a>
<br>
<a href='{{ url('auth/logout') }}'><button class="btn btn-danger btn-block">Logout</button></a>
<br>
<a href='{{ url('index/home') }}'><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}