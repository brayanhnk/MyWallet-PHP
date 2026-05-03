<?php
require_once 'includes/header.php';

check_auth();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $value_str = str_replace(['R$', ' ', '.'], '', $_POST['value'] ?? '0'); 
    $value = str_replace(',', '.', $_POST['value'] ?? '0');
    $type = $_POST['type'] ?? '';

    if (!empty($name) && is_numeric($value) && $value > 0 && in_array($type, ['receita', 'despesa'])) {
        add_transaction($name, $value, $type);
        $message = 'Transação registrada  com sucesso!';
    } else {
        $message = 'Por favor, preencha todos os campos corretamente.';
    }
}

$balance = calculate_balance();
$balance_class = $balance >= 0 ? 'positive-balance' : 'negative-balance';
?>

<div class = "dashboard-header">
    <h1>Dashboard Financeiro</h1>
    <p>Acompanhe e registre suas transações.</p>
</div>

<?php if($message): ?>
    <div class="alert <?= strpos($message, 'sucesso') !== false ? 'alert-sucess' : 'alert-error' ?>">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<div class="dashboard-grid">
    <div class="balance-card glass-panel <?= $balance_class ?>">
        <h3>Saldo Total</h3>
        <div class="balance-amout"><?= format_currency($balance) ?></div>
    </div>

    <div class="transaction-card glass-panel">
        <h3>Nova Transação</h3>
        <form method="POST" action="index.php" class="transaction-form">
            <div class="form-group">
                <label for="name">Descrição</label>
                <input type="text" id="name" name="name" required placeholder="Ex: Salário, Aluguel, Supermercado">
            </div>

            <div class="form-row">
                <div class="form-group half">
                    <label for="value">Valor (R$)</label>
                    <input type="number" step="0.01" min="0.01" id="value" name="value" required placeholder="0.00">
                </div>

                <div class="form-group half">
                    <label for="type">Tipo</label>
                    <div class="type-selectors">
                        <label class="radio-label income">
                            <input type="radio" name="type" value="receita" required>
                            <span>Receita ⬆</span>
                        </label>
                        <label class="radio-label expense">
                            <input type="radio" name="type" value="despesa" required>
                            <span>Despesa ⬇</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn-primary">Registrar Transação</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
