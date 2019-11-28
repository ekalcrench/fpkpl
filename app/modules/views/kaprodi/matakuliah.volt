{% extends 'layouts/default.volt' %}
{% block content %}
<br><br>
<h2 class="text-center">Daftar Matakuliah</h2>
<br><br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Kurikulum</th>
      </tr>
    </thead>
    <tbody>
        {% for lama in matakuliahLama %}
        <tr>
            <td>{{ lama.kode }}</td>
            <td>{{ lama.nama }}</td>
            <td>{{ lama.sks }}</td>
            <td>{{ lama.semester }}</td>
            <td>{{ lama.kurikulum }}</td>
        </tr>
        {% endfor %}
        {% for baru in matakuliahBaru %}
        <tr>
            <td>{{ baru.kode }}</td>
            <td>{{ baru.nama }}</td>
            <td>{{ baru.sks }}</td>
            <td>{{ baru.semester }}</td>
            <td>{{ baru.kurikulum }}</td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>
<div class="row">
    <div class="col-lg-6">
        <a href='{{ url('kaprodi/unduh') }}'><button class="btn btn-success btn-block">Unduh Template Matakuliah</button></a>
    </div>
    <div class="col-lg-6">
        <a href='{{ url('kaprodi/unggah') }}'><button class="btn btn-success btn-block">Unggah Matakuliah Kurikulum Baru</button></a>
    </div>
</div>
<br><br>
<a href='{{ url('kaprodi') }}'><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}