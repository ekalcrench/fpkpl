{% extends 'layouts/default.volt' %}
{% block content %}
{{ flashSession.output() }}
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
        {{ form('kaprodi/unduh', 'role': 'form', 'class': 'form-horizontal')}}
        <div class="form-group">
            <div class="col-sm-12">
                <input type="hidden" value="Template.xlsx" name="filename">
                <button type="submit" class="btn btn-success btn-block">Unduh Template Matakuliah</button>
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-6">
        <form action='{{ url('kaprodi/unggah') }}' method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="col-sm-12">
                <input type="file" name="file">
                <button type="submit" class="btn btn-success btn-block">Unggah Matakuliah Kurikulum Baru</button>
            </div>
        </div>
        </form>
    </div>
</div>
<br><br>
<a href='{{ url('kaprodi') }}'><button class="btn btn-danger btn-block">Back</button></a>

{% endblock %}