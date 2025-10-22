# Python Data Structures: Complete Reference

## List

* **Definition & Details:** List ek ordered, mutable collection hai jo duplicate values allow karti hai. Elements ko square brackets `[ ]` me rakha jata hai. List numeric, string, ya even dusre list ko contain kar sakti hai.
* **Declaration / Example:**

```python
my_list = [1, 2, 3, 'apple', 'banana']
```

* **15 Common Methods / Functions:**

```python
my_list.append("orange")
my_list.extend([5, 6])
my_list.insert(2, "kiwi")
my_list.remove("apple")
my_list.pop()
my_list.pop(1)
my_list.clear()
my_list.index("banana")
my_list.count(2)
my_list.sort()
my_list.reverse()
new_list = my_list.copy()
length = len(my_list)
total = sum([1,2,3])
maximum = max([1,2,3])
minimum = min([1,2,3])
```

## Tuple

* **Definition & Details:** Tuple ek ordered, immutable collection hai. Duplicate values allow hoti hain. Tuples ko parentheses `( )` me banaya jata hai.
* **Declaration / Example:**

```python
my_tuple = (1, 2, 3, 'apple', 'banana')
```

* **15 Common Methods / Functions:**

```python
my_tuple.count(2)
my_tuple.index("banana")
length = len(my_tuple)
maximum = max((1,2,3))
minimum = min((1,2,3))
total = sum((1,2,3))
tuple([1,2,3])
sorted(my_tuple)
any((0,1,2))
all((1,2,3))
list(my_tuple)
reversed(my_tuple)
str(my_tuple)
my_tuple.index("apple", 0, 5)
hash((1,2,3))
```

## Dictionary

* **Definition & Details:** Dictionary ek unordered, mutable data structure hai jo key-value pairs store karta hai. Keys unique hoti hain, values duplicate ho sakti hain. Curly braces `{ }` me declare hoti hai.
* **Declaration / Example:**

```python
my_dict = {'name':'Ali', 'age':25, 'city':'Karachi'}
```

* **15 Common Methods / Functions:**

```python
my_dict.keys()
my_dict.values()
my_dict.items()
my_dict.get("name")
my_dict.update({"age": 26})
my_dict.pop("city")
my_dict.popitem()
my_dict.clear()
new_dict = my_dict.copy()
length = len(my_dict)
my_dict.setdefault("country", "Pakistan")
dict(a=1, b=2)
del my_dict["age"]
"name" in my_dict
sorted(my_dict)
```

## Set

* **Definition & Details:** Set ek unordered, mutable collection hai jisme duplicates allowed nahi. Curly braces `{ }` ya `set()` se create hota hai. Mathematical set operations like union, intersection apply hoti hain.
* **Declaration / Example:**

```python
my_set = {1, 2, 3, 'apple'}
```

* **15 Common Methods / Functions:**

```python
my_set.add(5)
my_set.remove(3)
my_set.discard(4)
my_set.pop()
my_set.clear()
new_set = my_set.copy()
my_set.union({3,4,5})
my_set.update({6,7})
my_set.intersection({2,3,8})
my_set.intersection_update({2,3})
my_set.difference({1,2})
my_set.difference_update({1})
my_set.symmetric_difference({3,4})
my_set.symmetric_difference_update({5,6})
length = len(my_set)
```
