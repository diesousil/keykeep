<?php
namespace App\View\Components;

use Illuminate\View\Component;

class GroupTreeView extends Component
{
    public $treeData;

    public function __construct($treeData)
    {
        $this->treeData = $treeData;
    }

    public function renderNode($nodeData, $isRoot = false) {
        
        $childrenHtml = '';

        foreach($nodeData['children'] as $child) {
            $childrenHtml .= $this->renderNode($child);
        }

        return view('components.groupTreeView.node',['nodeData'=>$nodeData,'isRoot'=>$isRoot, 'childrenHtml'=>$childrenHtml])->render();
    }

    public function render()
    {
        $treeContent = '';

        foreach($this->treeData as $rootNode) {
            $treeContent .= $this->renderNode($rootNode, true);
        }

        return view('components.groupTreeView.tree',['treeContent'=>$treeContent]);
    }
}