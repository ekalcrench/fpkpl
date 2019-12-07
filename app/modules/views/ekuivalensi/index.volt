{% extends 'layouts/default.volt' %}
{% block content %}
{{ flashSession.output() }}
<br><br>
<h2 class="text-center">List Ekuivalensi Mahasiswa</h2>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>SKS</th>
        <th>Nilai</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
        {% for matkul in matkulAmbil %}
        <tr>
            <td>{{ matkul.matakuliahs.nama }}</td>
            <td>{{ matkul.matakuliahs.sks }}</td>
            <td>{{ matkul.nilai }}</td>
            <td>
                <a href="ekuivalensi/status/{{matkul.id}}/delete">
                    <button class="btn btn-danger">Delete</button> 
                </a>
                <a href="ekuivalensi/status/{{matkul.id}}/ambil">
                    <button class="btn btn-success">Ambil</button> 
                </a>
                <a href="ekuivalensi/status/{{matkul.id}}/bebas">
                    <button class="btn btn-default">Bebas</button> 
                </a>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Status</th>
            <th>Disetujui</th>
        </tr>
    </thead>
    <tbody>
        {% for matkul in allproses %}
        <tr>
            <td>{{ matkul.matakuliah_ambils.matakuliahs.nama }}</td>
            <td>{{ matkul.matakuliah_ambils.matakuliahs.sks }}</td>
            <td>{{ matkul.matakuliah_ambils.nilai }}</td>
            <td>{{ matkul.status }}</td>
            <td>{{ matkul.permanen }}</td>
            
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>
<a href="/mahasiswa"><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}