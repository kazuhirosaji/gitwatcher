<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Repo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="repos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('language_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($repos as $repo): ?>
        <tr>
            <td><?= $this->Number->format($repo->id) ?></td>
            <td><?= $this->Html->link(__(h($repo->title), true), h($repo->url), array('target'=>'_blank'));?></td>
            <td>
                <?= $repo->has('user') ? $this->Html->link($repo->user->name, ['controller' => 'Users', 'action' => 'view', $repo->user->id]) : '' ?>
            </td>
            <td>
                <?= $repo->has('language') ? $this->Html->link($repo->language->name, ['controller' => 'Languages', 'action' => 'view', $repo->language->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $repo->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $repo->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $repo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repo->id)]) ?>
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
