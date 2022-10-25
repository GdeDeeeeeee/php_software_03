<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Autor> $autors
 */
?>
<div class="autors index content">
    <?= $this->Html->link(__('New Autor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Autors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('pais') ?></th>
                    <th><?= $this->Paginator->sort('imagen') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autors as $autor): ?>
                <tr>
                    <td><?= $this->Number->format($autor->id) ?></td>
                    <td><?= h($autor->nombre) ?></td>
                    <td><?= h($autor->pais) ?></td>
                    <td><?= h($autor->imagen) ?></td>
                    <td><?= h($autor->created) ?></td>
                    <td><?= h($autor->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $autor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $autor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $autor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $autor->id)]) ?>
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
