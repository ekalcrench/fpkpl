{% extends 'layouts/default.volt' %}
{% block content %}

<br><br>
<a href='{{ url('ekuivalensi/relasi') }}'><button class="btn btn-default btn-block">Relasi Matakuliah</button></a>
<br>
<a href='{{ url('ekuivalensi/beban') }}'><button class="btn btn-default btn-block">Beban Ekuivalensi</button></a>
<br>
<a href='{{ url('index/home') }}'><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}
