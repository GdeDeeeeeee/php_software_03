<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ejemplar> $ejemplars
 */
?>
<div class="ejemplars index content">
<?= $this->Html->link(__('Logout'),['action' => '../users/logout'],['class' => 'button float-right']) ?>

    <?= $this->Html->link(__('New Ejemplar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ejemplars') ?></h3>

     <!-- Formulario de búsqueda -->
     <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key',
    ['label' => 'Buscar',
    'placeholder' => 'Ingrese editorial de ejemplar',
    'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->button(__('Buscar', ['action' => 'index'])) ?>
    <?= $this->Form->end() ?>


    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('isbn') ?></th>
                    <th><?= $this->Paginator->sort('editorial') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('libro_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ejemplars as $ejemplar): ?>
                <tr>
                    <td><?= $this->Number->format($ejemplar->id) ?></td>
                    <td><?= h($ejemplar->isbn) ?></td>
                    <td><?= h($ejemplar->editorial) ?></td>
                    <td><?= $ejemplar->cantidad === null ? '' : $this->Number->format($ejemplar->cantidad) ?></td>
                    <td><?= $ejemplar->has('libro') ? $this->Html->link($ejemplar->libro->id, ['controller' => 'Libros', 'action' => 'view', $ejemplar->libro->id]) : '' ?></td>
                    <td><?= h($ejemplar->modified) ?></td>
                    <td><?= h($ejemplar->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ejemplar->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ejemplar->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ejemplar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ejemplar->id)]) ?>
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
