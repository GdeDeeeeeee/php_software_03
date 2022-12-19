<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venta> $ventas
 */
?>
<div class="ventas index content">
    <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ventas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ejemplar_id') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th> -->
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?= $this->Number->format($venta->id) ?></td>
                    <td><?= $venta->has('ejemplar') ? $this->Html->link($venta->ejemplar->id, ['controller' => 'Ejemplars', 'action' => 'view', $venta->ejemplar->id]) : '' ?></td>
                    <td><?= $this->Number->format($venta->cantidad) ?></td>
                    <td><?= $this->Number->format($venta->ejemplar->precio, [

                    'places' => 2,
                    'before' => 'S/. '
                    ]) ?></td>
                    <td><?=$this->Number->format(

                    $venta->cantidad * $venta->ejemplar->precio, [

                    'places' => 2,
                    'before' => 'S/. '

                    ] ) ?>

                    </td>
                    <!-- <td><?= h($venta->created) ?></td>
                    <td><?= h($venta->modified) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venta->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venta->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
