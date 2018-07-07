<!DOCTYPE html>
<html>
<head>
<title>ExitCodes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Client Tools User's Guide</a></p>
<h1>BeStMan SRM-Client Tools User's Guide: Exit Codes</h1>
<p>When BeStMan SRM-Client commands exit, they have exit codes as following:</p>
<table>
<tr>
<th>0</th>
<th>SRM_SUCCESS</th>
</tr>
<tr>
<td>51</td>
<td>SRM_FAILURE</td>
</tr>
<tr>
<td>52</td>
<td>SRM_AUTHENTICATION_FAILURE</td>
</tr>
<tr>
<td>53</td>
<td>SRM_AUTHORIZATION_FAILURE</td>
</tr>
<tr>
<td>54</td>
<td>SRM_INVALID_REQUEST</td>
</tr>
<tr>
<td>55</td>
<td>SRM_INVALID_PATH</td>
</tr>
<tr>
<td>56</td>
<td>SRM_FILE_LIFETIME_EXPIRED</td>
</tr>
<tr>
<td>57</td>
<td>SRM_SPACE_LIFETIME_EXPIRED</td>
</tr>
<tr>
<td>58</td>
<td>SRM_EXCEED_ALLOCATION</td>
</tr>
<tr>
<td>59</td>
<td>SRM_NO_USER_SPACE</td>
</tr>
<tr>
<td>60</td>
<td>SRM_NO_FREE_SPACE</td>
</tr>
<tr>
<td>61</td>
<td>SRM_DUPLICATION_ERROR</td>
</tr>
<tr>
<td>62</td>
<td>SRM_NON_EMPTY_DIRECTORY</td>
</tr>
<tr>
<td>63</td>
<td>SRM_TOO_MANY_RESULTS</td>
</tr>
<tr>
<td>64</td>
<td>SRM_INTERNAL_ERROR</td>
</tr>
<tr>
<td>65</td>
<td>SRM_FATAL_INTERNAL_ERROR</td>
</tr>
<tr>
<td>66</td>
<td>SRM_NOT_SUPPORTED</td>
</tr>
<tr>
<td>67</td>
<td>SRM_REQUEST_QUEUED</td>
</tr>
<tr>
<td>68</td>
<td>SRM_REQUEST_INPROGRESS</td>
</tr>
<tr>
<td>69</td>
<td>SRM_REQUEST_SUSPENDED</td>
</tr>
<tr>
<td>70</td>
<td>SRM_ABORTED</td>
</tr>
<tr>
<td>71</td>
<td>SRM_RELEASED</td>
</tr>
<tr>
<td>72</td>
<td>SRM_FILE_PINNED</td>
</tr>
<tr>
<td>73</td>
<td>SRM_FILE_IN_CACHE</td>
</tr>
<tr>
<td>74</td>
<td>SRM_SPACE_AVAILABLE</td>
</tr>
<tr>
<td>75</td>
<td>SRM_LOWER_SPACE_GRANTED</td>
</tr>
<tr>
<td>76</td>
<td>SRM_DONE</td>
</tr>
<tr>
<td>77</td>
<td>SRM_PARTIAL_SUCCESS</td>
</tr>
<tr>
<td>78</td>
<td>SRM_REQUEST_TIMED_OUT</td>
</tr>
<tr>
<td>79</td>
<td>SRM_LAST_COPY</td>
</tr>
<tr>
<td>80</td>
<td>SRM_FILE_BUSY</td>
</tr>
<tr>
<td>81</td>
<td>SRM_FILE_LOST</td>
</tr>
<tr>
<td>82</td>
<td>SRM_FILE_UNAVAILABLE</td>
</tr>
<tr>
<td>83</td>
<td>SRM_UNKNOWN_ERROR</td>
</tr>
<tr>
<td>84</td>
<td>Returned status matches none of the above SRM status (it cannot be possible though)</td>
</tr>
<tr>
<td>90</td>
<td>Connection refused</td>
</tr>
<tr>
<td>91</td>
<td>GSI mapping not found</td>
</tr>
<tr>
<td>92</td>
<td>General unpredictable exception</td>
</tr>
<tr>
<td>93</td>
<td>Input error</td>
</tr>
<tr>
<td>94</td>
<td>Other error, not reached SRM yet</td>
</tr>
<tr>
<td>95</td>
<td>Connection not established</td>
</tr>
<tr>
<td>96</td>
<td>GSI proxy type mismatch</td>
</tr>
<tr>
<td>100</td>
<td>SRM returned no status or null status, and it is a failure</td>
</tr>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>