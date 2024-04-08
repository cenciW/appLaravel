<!--
                'name' => 'required',
            'description' => 'required',
            'dt_start' => 'required',
            'active' => 'required',
 -->

<div>
    <div class="mb-3">
        <Label class="form-label">Nome</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o nome Completo"
            class="form-control @error('name') is-invalid @enderror"
            type="text" name="name" id="name"
            value="{{ $registro->name ?? old('name')}}">
        @error('name')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">Descrição</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira a descrição"
            class="form-control @error('description') is-invalid @enderror"
            type="text" name="description" id="description"
            value="{{ $registro->description ?? old('description')}}">
        @error('description')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">Data Inicial</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira a data inicial"
            class="form-control @error('dt_start') is-invalid @enderror"
            type="date" name="dt_start" id="dt_start"
            value="{{ $registro->dt_start ?? old('dt_start')}}">
        @error('dt_start')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
    <label class="form-label" for="ativo">Ativo</label>
    <input class="form-control @error('ativo') is-invalid @enderror"
           type="checkbox" name="ativo" id="ativo"
           value="1" {{ ($registro->ativo ?? old('ativo')) ? 'checked' : '' }}>
    @error('ativo')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
</div>
