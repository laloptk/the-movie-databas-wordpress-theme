<div class="form-filter">
    <form id="movies-filter">
        <!-- <label for="actor-name">Actor Name</label>
        <input type="text" id="actor-name" > -->
        <label for="genre">Genre</label>
        <select id="genre">
            <option selected="true" disabled="disabled">Select a Genre...</option>
            <?php 
                $genres = get_all_genres();
                foreach($genres as $genre):
            ?>
                <option value="<?php echo $genre['id']; ?>">
                    <?php echo $genre['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php $years = range(date('Y'), 1900); ?>
        <label for="genre">Year</label>
        <select id="year">
            <option selected="true" disabled="disabled">Select a Year...</option>
            <?php foreach($years as $year): ?>
                <option value="<?php echo $year; ?>">
                    <?php echo $year; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Filter">
    </form>
    <!-- <form id="search-movies">
        <input type="text" name="movie-title" id="movie-title" />
        <input type="submit" value="Find">
    </form> -->
</div>