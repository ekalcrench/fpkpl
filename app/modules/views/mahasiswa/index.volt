{% extends 'layouts/default.volt' %}
{% block content %}

<br><br>
<a href='{{ url('ekuivalensi') }}'><button class="btn btn-default btn-block">Ekuivalensi</button></a>
<br>
<a href='{{ url('index/home') }}'><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}
