<?php

namespace App\Repositories\Credential;

use App\Repositories\Repository;
use App\Models\Credential\Credential;
use App\Models\Credential\CredentialTag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CredentialRepository extends Repository
{
    public function __construct(
        Credential $model
    ) {
        parent::__construct($model);
    }

    protected function getQuery(): Builder
    {
        return $this->model->where("user_id", auth()->user()->id)->with(["tags"]);
    }

    private function deleteRelatedTags(int|string $id)
    {
        CredentialTag::where("credential_id", $id)->delete();
    }

    public function saveRelatedTags(array $tagsIds, int|string $credentialId)
    {
        $data = [];
        foreach ($tagsIds as $tagId) {
            $data[] = [
                "id"            => Str::uuid(),
                "credential_id" => $credentialId,
                "tag_id"        => $tagId,
                "created_at"    => Carbon::now(),
                "updated_at"    => Carbon::now()
            ];
        }

        return DB::transaction(function () use ($data, $credentialId) {
            $this->deleteRelatedTags($credentialId);
            return CredentialTag::insert($data);
        });

    }
}
