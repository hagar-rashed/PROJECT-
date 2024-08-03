<?php

        namespace App\Repositories\Sql;
        use App\Models\villageImage;
        use App\Repositories\Contract\VallageImageRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class VallageImageRepository extends BaseRepository implements VallageImageRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new villageImage();

            }

        }