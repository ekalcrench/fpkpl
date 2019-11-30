{% extends 'layouts/default.volt' %}
{% block content %}
{{ flashSession.output() }}
<br><br>
<h2 class="text-center">Data Mahasiswa yang Terkena Ekuivalensi</h2>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>NRP</th>
        <th>Nama</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
        {% for mahasiswa in mahasiswaBeban %}
        <tr>
            <td>{{ mahasiswa.mahasiswas.nrp }}</td>
            <td>{{ mahasiswa.mahasiswas.nama }}</td>
            <td><a href="deleteBeban/{{mahasiswa.id}}"><button class="btn btn-danger">Delete</button></a></td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>
{{ form('ekuivalensi/createBeban', 'role': 'form', 'class': 'form-horizontal')}}
    <div class="form-group">
        <div class="col-sm-12">
            <label for="mahasiswa">Mahasiswa</label>
            <select class="form-control" name="mahasiswa">
                {% for mahasiswa in mahasiswas %}
                    <option value="{{mahasiswa.id}}">
                        {{ mahasiswa.nrp }}
                        {{ mahasiswa.nama }}
                    </option>
                {% endfor %}
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success btn-block">Tambah Proses Beban Ekuivalensi</button>
        </div>
    </div>
</form>
<br><br>
<a href="/dosen"><button class="btn btn-default btn-block">Back</button></a>

{% endblock %}
