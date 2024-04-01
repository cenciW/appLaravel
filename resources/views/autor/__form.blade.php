<div>
    <div class="mb-3">
        <Label class="form-label">Nome</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o nome Completo" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" value="{{ isset($registro->nome) ? $registro->nome : ''}}">
        @error('nome')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">Apelido</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o apelido" class="form-control @error('apelido') is-invalid @enderror" type="text" name="apelido" id="apelido" value="{{ isset($registro->apelido) ? $registro->apelido : ''}}">
        @error('apelido')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">Cidade</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira a Cidade" class="form-control @error('cidade') is-invalid @enderror" type="text" name="cidade" id="cidade" value="{{ isset($registro->cidade) ? $registro->cidade : ''}}">
        @error('cidade')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">Bairro</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o Bairro" class="form-control @error('bairro') is-invalid @enderror" type="text" name="bairro" id="bairro" value="{{ isset($registro->bairro) ? $registro->bairro : ''}}">
        @error('bairro')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">CEP</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o CEP" class="form-control @error('cep') is-invalid @enderror" type="text" name="cep" id="cep" value="{{ isset($registro->cep) ? $registro->cep : ''}}">
        @error('cep')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">E-mail</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ isset($registro->email) ? $registro->email : ''}}">
        @error('email')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>

    <div class="mb-3">
        <Label class="form-label">Telefone</Label>
        <!-- isset é para validar se o campo é nulo -->
        <input placeholder="Insira o telefone" class="form-control @error('telefone') is-invalid @enderror" type="text" name="telefone" id="telefone" value="{{ isset($registro->telefone) ? $registro->telefone : ''}}">
        @error('telefone')
        <!-- <div class="alert alert-danger">{{ $message }}</div> -->
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror()
    </div>
</div>
</div>