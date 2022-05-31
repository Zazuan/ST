<?php

namespace Admin\model\plugin;

use Potato\Model;

class PluginRepository extends Model
{
    public function getPlugins()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('plugin')
            ->sql();

        return $this->db->query($sql);
    }

    public function getActivePlugins()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('plugin')
            ->where('is_active', 1)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function addPlugin($directory)
    {
        $plugin = new Plugin();
        $plugin->setDirectory($directory);

        return $plugin->save();
    }

    public function activatePlugin($id, $active)
    {
        $plugin = new Plugin($id);
        $plugin->setIsActive($active);

        return $plugin->save();
    }

    public function deletePlugin($itemId)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('plugin')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function isInstallPlugin($directory)
    {
        $sql = $this->queryBuilder
            ->select('COUNT(id) as count')
            ->from('plugin')
            ->where('directory', $directory)
            ->limit(1)
            ->sql();

        $query = $this->db->query($sql, $this->queryBuilder->values);

        if ($query[0]->count > 0) {
            return true;
        }
        return false;
    }

    public function isActivePlugin($directory)
    {
        $sql = $this->queryBuilder
            ->select('COUNT(id) as count')
            ->from('plugin')
            ->where('directory', $directory)
            ->where('is_active', 1)
            ->limit(1)
            ->sql();

        $query = $this->db->query($sql, $this->queryBuilder->values);

        if ($query[0]->count > 0) {
            return true;
        }
        return false;
    }
}