
<h4>This is new.blade.php <br> {{$name}} </h4>
<br>
{{-- <p> {{$agenda}} </p> --}}
<pre> {{$var1}}   |   {{$var2}}</pre>

 <h4>This is new.blade.php <br> {{$share}} </h4>


<pre>
    View Composers:
-Run just before a view is rendered.
-Used to bind data to views every time they are loaded.

    View Creators:
-Run immediately after the view is created (instantiated).
-Similar to composers but run slightly earlier in the view lifecycle.</pre>
<br>
<p>
View composers are callbacks or class methods that are called when a view is rendered. If you have data that you want to be bound to a view each time that view is rendered, a view composer can help you organize that logic into a single location. View composers may prove particularly useful if the same view is returned by multiple routes or controllers within your application and always needs a particular piece of data.</p>
<p>
 View "creators" are very similar to view composers; however, they are executed immediately after the view is instantiated instead of waiting until the view is about to render. To register a view creator, use the creator method:</p>