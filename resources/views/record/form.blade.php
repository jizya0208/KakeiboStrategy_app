@extends('layout')
@section('title', '家計簿レコード記録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>収支レコード記録フォーム</h2>
        <form method="POST" action="{{ route('expenseStore') }}" onSubmit="return checkSubmit()">
        @csrf <!-- CSRF対策のための記述-->
             <div class="form-group">
                <label for="date">日付</label>
                <input
                    id="date"
                    name="date"
                    class="form-control"
                    value="{{ old('date') }}"
                    type="date"
                >
                @if ($errors->has('date'))
                  <div class="text-danger">
                      {{ $errors->first('date') }}
                  </div>
                @endif
            </div>
            <div class="form-group">
                <label for="amount">
                    金額
                </label>
                <input
                    id="amount"
                    name="amount"
                    class="form-control"
                    value="{{ old('amount') }}"
                ></input>
                @if ($errors->has('amount'))
                    <div class="text-danger">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
              <label for="expense_type_id">支出分類</label>
              <select name="expense_type_id" class="custom-select form-control">
                @foreach($expense_types as $expense_type)
                    <option value="{{ $expense_type->id }}" {{ old('expense_type', $expense->expense_type_id ?? '') == $expense_type->id ? 'selected' : '' }}>
                      {{ $expense_type->name }}
                    </option>
                @endforeach
              </select>
              @if ($errors->has('expense_type_id'))
                <div class="text-danger">
                    {{ $errors->first('expense_type_id') }}
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="expense_category_id">費目</label>
              <select name="expense_category_id" class="custom-select form-control">
                @foreach($expense_categories as $expense_category)
                    <option value="{{ $expense_category->id }}" {{ old('expense_category', $expense->expense_category_id ?? '') == $expense_category->id ? 'selected' : '' }}>
                      {{ $expense_category->name }}
                    </option>
                @endforeach
              </select>
              @if ($errors->has('expense_category_id'))
                <div class="text-danger">
                    {{ $errors->first('expense_category_id') }}
                </div>
              @endif
            </div>

            <div class="form-group">
                <label for="summary">摘要</label>
                <textarea
                    id="summary"
                    name="summary"
                    class="form-control"
                >{{ old('summary') }}</textarea>
                @if ($errors->has('summary'))
                    <div class="text-danger">
                        {{ $errors->first('summary') }}
                    </div>
                @endif
            </div>

            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('records') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    記録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection