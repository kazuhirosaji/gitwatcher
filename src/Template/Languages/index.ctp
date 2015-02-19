<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Repos'), ['controller' => 'Repos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Repo'), ['controller' => 'Repos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="languages index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('updated') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($languages as $language): ?>
        <tr>
            <td><?= $this->Number->format($language->id) ?></td>
            <td><?= h($language->name) ?></td>
            <td><?= h($language->created) ?></td>
            <td><?= h($language->updated) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $language->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $language->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
