<?php 
require_once 'includes/header.php';

check_auth();

$transactions = get_transactions();

usort($transactions, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});
$total_expenses = calculate_total_expenses();
?>

<div class="dashboard-header">
    <h1>Histórico de Transações</h1>
    <p>Veja o histórico completo de suas receitas e despesas.</p>
</div>

<div class="history-card glass-panel">
    <?php if(empty($transactions)): ?>
        <div class="empty-state">
            <div class="empty-icon">📭</div>
            <p>Nenhuma transação registrada no momento.</p>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="transactions-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>% das Despesas</th>
                        <th>Impacto no Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $t): ?>
                        <?php 
                            $is_income = $t['type'] === 'receita';
                            $row_class = $is_income ? 'row-income' : 'row-expense';
                            $impact = $is_income ? '+' . format_currency($t['value']) : '-' . format_currency($t['value']);

                            $percent = '-';
                            if (!$is_income && $total_expenses > 0) {
                                $pct = ($t['value'] / $total_expenses) * 100;
                                $percent = number_format($pct, 1, ',', '.') . '%';
                            }
                        ?>
                        <tr class="<?= $row_class ?>">
                            <td><?= date('d/m/Y H:i', strtotime($t['date'])) ?></td>
                            <td><?= htmlspecialchars($t['name']) ?></td>
                            <td>
                                <span class="badge <?= $is_income ? 'badge-income' : 'badge-expense' ?>">
                                    <?= ucfirst($t['type']) ?>
                                </span>
                            </td>
                            <td class="value-cell"><?= format_currency($t['value']) ?></td>
                            <td>
                                <?php if(!$is_income): ?>
                                    <div class="progress-bar-container tooltip-trigger" title="Representa <?= $percent ?> de todas as despesas">
                                        <div class="progress-bar" style="width: <?= $pct ?>%"></div>
                                        <span class="progress-text"><?= $percent ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="impact-cell"><?= $impact ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
