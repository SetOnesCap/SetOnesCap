<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/templates/header.php');
?>


<div class="main-content">
    <div class="container">
        <div v-if="activePage == 'tracks'" v-for="track in tracks" class="row border-row">
            <div class="col-md-12 input-group">
                <input type="text" id="title" v-model="track.title" class="input-title">
                <label for="title">Title</label>
            </div>
            <div class="col-md-4 input-group">
                <input type="text" id="released_time" v-model="track.released_time">
                <label for="released_time">Released time:</label>
            </div>
            <div class="col-md-4 input-group">
                <input type="text" id="stream_source" v-model="track.stream_source"/>
                <label for="stream_source">Stream source:</label>
            </div>

            <div class="col-md-4"></div>

            <div class="col-md-12">
                <audio controls preload="none">
                    <source src="{{ track.stream_source }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div class="clearfix"></div>

        </div>
        <div v-if="activePage == 'posts'" v-for="post in posts | orderBy 'created_time_unix' -1" class="row border-row">
            <div class="col-md-4">
                <ul class="api-data">
                    <li><b>source: </b><span>{{ post.source }}</span></li>
                    <li><b>created_time:</b> <span>{{ post.created_time }}</span></li>
                    <li><b>created_time_unix:</b> <span>{{ post.created_time_unix }}</span></li>
                    <li><b>created_time_iso:</b> <span>{{ post.created_time_iso }}</span></li>
                    <li><b>updated_time_iso:</b> <span>{{ post.updated_time_iso }}</span></li>
                    <li><b>images:</b>
                            <span v-for="(index, image) in post.images">
                                    <a title="{{index}}" href="{{ image.source }}" class="tooltip"><span class="icon image-file"></span></a>
                            </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                {{ post.message }}
            </div>
            <div class="col-md-2">

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/templates/footer.php');
?>