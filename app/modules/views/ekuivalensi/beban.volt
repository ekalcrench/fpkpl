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
            {% if auth['table'] == "Dosen" %}
                <td><a href="deleteBeban/{{mahasiswa.id}}"><button class="btn btn-danger">Delete</button> </a><a href="prosesBeban/{{mahasiswa.id_mahasiswa}}"><button class="btn btn-success">Proses</button></a></td>
            {% endif %}
            {% if auth['table'] == "Kaprodi" %}
                <td><a href="prosesBeban/{{mahasiswa.id}}"><button class="btn btn-success">Proses</button></a></td>
            {% endif %}
        </tr>
        {% endfor %}
    </tbody>
</table>
{% if auth['table'] == "Dosen" %}
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
{% endif %}
<br><br>
{% if auth['table'] == "Dosen" %}
    <a href="/dosen"><button class="btn btn-danger btn-block">Back</button></a>
{% endif %}
{% if auth['table'] == "Kaprodi" %}
    <a href="/kaprodi"><button class="btn btn-danger btn-block">Back</button></a>
{% endif %}

{% endblock %}
