<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html {{ $attributes->except(['dir', 'lang'])->merge(['dir' => $dir, 'lang' => $lang]) }}>
    {{ $slot }}
</html>