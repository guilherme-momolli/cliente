<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" value="{{ old('nome', $cliente->nome ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" name="endereco" value="{{ old('endereco', $cliente->endereco ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label for="user_id" class="form-label">Usuário</label>
    <select name="user_id" class="form-select" required>
        <option value="">Selecione um usuário</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ (old('user_id', $cliente->user_id ?? '') == $user->id) ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
            </option>
        @endforeach
    </select>
</div>
