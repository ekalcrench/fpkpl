{% extends 'layouts/default.volt' %}
{% block content %}
{{ flashSession.output() }}
<br><br>
{{ form('ekuivalensi/createRelasi', 'role': 'form', 'class': 'form-horizontal')}}
    <div class="form-group">
        <label class="control-label col-sm-2" for="matkulLama">Matakuliah Lama:</label>
        <div class="col-sm-10">
            <select class="form-control" name="matkulLama">
                {% for lama in matakuliahLama %}
                    <option value="{{lama.id}}">
                        {{ lama.nama }}
                    </option>
                {% endfor %}
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="relasi">Relasi:</label>
        <div class="col-sm-10">
            <select class="form-control" name="relasi">
                <option>OR</option>
                <option>AND</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="matkulBaru">Matakuliah Baru:</label>
        <div class="col-sm-10">
            <select class="form-control" name="matkulBaru">
                {% for baru in matakuliahBaru %}
                    <option value="{{baru.id}}">
                        {{ baru.nama }}
                    </option>
                {% endfor %}
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success btn-block">Create</button>
        </div>
    </div>
</form>

<a href="/dosen"><button class="btn btn-default btn-block">Back</button></a>

{% endblock %}