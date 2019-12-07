{% extends 'layouts/default.volt' %}
{% block content %}
<br><br>
<h2 class="text-center">Persetujuan Ekuivalensi Mahasiswa</h2>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Status</th>
            <th>Disetujui</th>
            <th colspan="2">Option</th>
        </tr>
    </thead>
    <tbody>
        {% for proses in allproses %}
        <tr>
            <td>{{ proses.matakuliah_ambils.matakuliahs.nama }}</td>
            <td>{{ proses.matakuliah_ambils.matakuliahs.sks }}</td>
            <td>{{ proses.matakuliah_ambils.nilai }}</td>
            <td>{{ proses.status }}</td>
            <td>{{ proses.permanen }}</td>
            <td>
                <a href="/ekuivalensi/permanen/{{id_mahasiswa}}/{{proses.id}}/YES">
                    <button class="btn btn-success">YES</button> 
                </a>
                <a href="/ekuivalensi/permanen/{{id_mahasiswa}}/{{proses.id}}/NO">
                    <button class="btn btn-danger">NO</button> 
                </a>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>

<a href="/ekuivalensi/beban"><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}
