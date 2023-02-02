<h2 id="how-to-start-project">How to start project</h2>
<ul>
    <li>First of all you need to install <a href="https://docs.docker.com/install/">Docker</a> </li>
    <li>Clone this repository</li>
    <li>Run <code>chmod 755 ./server-migrate.sh ./server-start.sh ./front-start.sh</code> in the root of the project</li>
    <li>Run <code>./server-start.sh</code> in the root of the project</li>
    <li>Run <code>./server-migrate.sh</code> in the root of the project in another terminal window <strong>&quot;only after previous command is finished&quot;</strong></li>
    <li>Run <code>./front-start.sh</code> in the root of the project</li>
    <li>Open <code>http://localhost:3000</code> in your browser and sign up as a new user</li>
    <li>Backend is available on <code>http://localhost:7140</code></li>
</ul>
<h2 id="how-to-add-new-news-source">How to add new news source</h2>
<ul>
    <li>Run <code>./vendor/bin/sail artisan make:source &lt;source_name&gt;</code> in the <strong>server</strong> folder of the project</li>
    <li>Add your source to the <code>config/news.php</code> file, you can see an example of the source there</li>
</ul>
<h2 id="notes">Notes</h2>
<ul>
    <li>I have added 4 news sources API:  <a href="https://newsapi.org">Newsapi.org</a>, <a href="https://gnews.io">Gnews.io</a>, <a href="https://newsdata.io">Newsdata.io</a>, <a href="https://www.theguardian.com">The Guardian</a></li>
</ul>
