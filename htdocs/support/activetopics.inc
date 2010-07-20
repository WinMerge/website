<?php
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

class Forum_ActiveTopics {
    /**
     * ...
     * @var string ...
     */
    private $_forumHome;

    /**
     * ...
     * @var array ...
     */
    private $_topics;

    /**
     * ...
     * @param string $forumHome ...
     */
    public function __construct($forumHome) {
        $this->_forumHome = $forumHome;
        $this->_topics = array();

        $this->update();
    }

    /**
     * ...
     * @param int $start ...
     * @param int $end ...
     * @return array ...
     */
    public function getTopics($start = 0, $end = 0) {
        if ($end == 0) {
            return array_slice($this->_topics, $start);
        }
        else {
            return array_slice($this->_topics, $start, $end);
        }
        //return $this->_topics;
    }

    /**
     * ...
     * @param int $days ...
     */
    public function update($days = 30) {
        $this->_topics = array();
        $html = file_get_contents($this->_forumHome . 'search.php?st=' . $days . '&search_id=active_topics');
        if (preg_match_all('#<a href="\./(.*?)&amp;sid=[a-z0-9]+" class="topictitle">(.*?)</a>#im', $html, $matches)) {
            $links = $matches[1];
            $titles = $matches[2];
            for ($i = 0; $i < count($links); $i++) { //for all topics...
                $link = $this->_forumHome . $links[$i];
                $title = $titles[$i];

                $this->_topics[] = new Forum_Topic($link, $title);
            }
        }
    }
}

class Forum_Topic {
    /**
     * ...
     * @var string ...
     */
    private $_link;

    /**
     * ...
     * @var string ...
     */
    private $_title;

    /**
     * ...
     * @param string $link ...
     * @param string $title ...
     */
    public function __construct($link, $title) {
        $this->_link = $link;
        $this->_title = $title;
    }

    /**
     * ...
     * @return string ...
     */
    public function getLink() {
        return $this->_link;
    }

    /**
     * ...
     * @return string ...
     */
    public function getTitle() {
        return $this->_title;
    }
}
?>
