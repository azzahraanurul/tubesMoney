<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Financial Record Summary') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
            color: #008080;
        }
        .summary {
            margin-bottom: 20px;
        }
        .summary table {
            width: 100%;
        }
        .summary td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            background: #f9f9f9;
            font-weight: bold;
        }
        .summary td.income { color: green; }
        .summary td.expense { color: red; }
        .summary td.balance { color: #008080; }
        
        .transactions {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .transactions th, .transactions td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .transactions th {
            background-color: #008080;
            color: white;
            text-align: center;
        }
        .text-right {
            text-align: right !important;
        }
        .text-center {
            text-align: center !important;
        }
        .badge-income { color: green; font-weight: bold; }
        .badge-expense { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h2>{{ __('Financial Record Summary') }}</h2>
        <p>{{ __('Print Date:') }} {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>
    </div>

    <div class="summary">
        <table>
            <tr>
                <td>{{ __('Total Income') }}<br><span class="income">Rp {{ number_format($income, 0, ',', '.') }}</span></td>
                <td>{{ __('Total Expenses') }}<br><span class="expense">Rp {{ number_format($expense, 0, ',', '.') }}</span></td>
                <td>{{ __('Balance') }}<br><span class="balance">Rp {{ number_format($balance, 0, ',', '.') }}</span></td>
            </tr>
        </table>
    </div>

    <table class="transactions">
        <thead>
            <tr>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Title/Description') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Amount') }}</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($transactions) && count($transactions) > 0)
                @foreach ($transactions as $t)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($t->date)->format('d M Y') }}</td>
                        <td>{{ __($t->category) }}</td>
                        <td>{{ $t->title }}</td>
                        <td>
                            @if($t->type == 'income')
                                <span class="badge-income">{{ __('Income') }}</span>
                            @else
                                <span class="badge-expense">{{ __('Expense') }}</span>
                            @endif
                        </td>
                        <td>Rp {{ number_format($t->amount, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">{{ __('No transactions yet') }}</td>
                </tr>
            @endif
        </tbody>
    </table>

</body>
</html>
