<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Venta'), ['action' => 'edit', $venta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Venta'), ['action' => 'delete', $venta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ventas view content">
            <h3><?= h($venta->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ejemplar') ?></th>
                    <td><?= $venta->has('ejemplar') ? $this->Html->link($venta->ejemplar->id, ['controller' => 'Ejemplars', 'action' => 'view', $venta->ejemplar->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($venta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($venta->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($venta->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($venta->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($venta->ejemplar->precio, [

                        'places' => 2,
                        'before' => 'S/. '
                        ]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?=$this->Number->format(

                    $venta->cantidad * $venta->ejemplar->precio, [

                    'places' => 2,
                    'before' => 'S/. '

                    ] ) ?>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observaciones') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($venta->observaciones)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
