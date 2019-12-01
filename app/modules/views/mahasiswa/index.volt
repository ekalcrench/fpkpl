{% extends 'layouts/default.volt' %}
{% block content %}

<br><br>
<a href='{{ url('ekuivalensi') }}'><button class="btn btn-default btn-block">Ekuivalensi</button></a>
<br>
<a href="auth/logout"><button class="btn btn-danger">Logout</button></a>

{% endblock %}
