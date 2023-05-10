(function ($) {
  var isWorking = false
  var $form

  // Initialize our own filters
  initFilters()

  /**
   * Bind initialization, this is done every time new page content is loaded,
   * and on the initial pageload.
   */
  function initFilters() {
    // Update reference to the new form in response
    $form = $('#severalnines-filters-form')

    $('select#filter-category').on('change', function () {
      $('input[name=filter-category]', $form).val($(this).val())
			if ($(this).val() === '') {
				$(this).closest('.select-wrapper').removeClass('selected');
			} else {
				$(this).closest('.select-wrapper').addClass('selected');
			}
      $form.submit()
    })

		$('select#filter-related-product').on('change', function () {
			$('input[name=filter-related-product]', $form).val($(this).val())
			if ($(this).val() === '') {
				$(this).closest('.select-wrapper').removeClass('selected');
			} else {
				$(this).closest('.select-wrapper').addClass('selected');
			}
			$form.submit()
		})

		$('select#filter-related-technology').on('change', function () {
			$('input[name=filter-related-technology]', $form).val($(this).val())
			if ($(this).val() === '') {
				$(this).closest('.select-wrapper').removeClass('selected');
			} else {
				$(this).closest('.select-wrapper').addClass('selected');
			}
			$form.submit()
		})

  }

  /**
   * Bind form submit
   */
	$(document).on('submit', '#severalnines-filters-form', function (event) {
    event.preventDefault()

    $form = $(this)
    var url = $form.attr('action')

    // Loop hidden inputs and create GET parameters
    $('input', $form).each(function (i, el) {
      var name = $(el).attr('name')
      var value = el.value
      if (value == '') {
        url = setUrlParameter(url, name)
      } else if (name != 'paged') {
        url = setUrlParameter(url, name, value)
      }
    })

    loadPage(url)
  })

  /**
   * Bind pagination links
   */
  $(document).on('click', '.nav-links a', function (event) {
    event.preventDefault()

    // Scroll to top
    $('body, html').animate({scrollTop: $('.archive-list').offset().top - 100}, 300)

    // Update content
    loadPage($(this).attr('href'))
  })

  /**
   * Update history and get new content
   */
  function loadPage(url, push = true) {
    // Check if already doing ajax
    if (isWorking) {
      return false
    }

    if (push) {
      // IE doesn't support
      if (!navigator.userAgent.match(/msie/i)) {
        var stateObj = {
          url: url,
        }
        history.pushState(stateObj, 'Filtered products', url)
      }
    }

    $.ajax({
      type: 'get',
      url: url,
      beforeSend: working(true),
      success: function (response) {
        updatePageContent(response)
        working(false)
      },
    })
  }

  /**
   * loadPage when going back
   */
  window.onpopstate = function (event) {
    loadPage(window.location.href, false)
  }

  /**
   * Update page content
   */
  function updatePageContent(html) {
    // Get the fragments that we need
    var fragments = ['.archive-list']

    $.each(fragments, function (i, fragment) {
      // Check if element exists, so we can replace it
      if ($(fragment).length) {
        $(fragment).html($(fragment, html).html())
      }
    })

  }

  /**
   * Helper for state
   */
  function working(isWorking) {
    // Update state
    isWorking = isWorking

    // Fade elements
    var opacity = isWorking ? 0.5 : 1
    $('.archive-list').fadeTo(300, opacity)

    // Disable form if doing ajax
    $('input, select', $form).each(function (i, el) {
      $(el).attr('disabled', isWorking)
    })
  }

  /**
   * Helpers for query string params
   */
  function getUrlParameter(name, url) {
    if (!url) url = location.href
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]')
    var regexS = '[\\?&]' + name + '=([^&#]*)'
    var regex = new RegExp(regexS)
    var results = regex.exec(url)
    return results == null ? null : results[1]
  }

  function setUrlParameter(url, key, value) {
    if (value != undefined) {
      value = encodeURI(value)
    }
    var urls = url.split('?')
    var baseUrl = urls[0]
    var parameters = ''
    var outPara = {}
    if (urls.length > 1) {
      parameters = urls[1]
    }
    if (parameters != '') {
      parameters = parameters.split('&')
      for (k in parameters) {
        var keyVal = parameters[k]
        keyVal = keyVal.split('=')
        var ekey = keyVal[0]
        var eval = ''
        if (keyVal.length > 1) {
          eval = keyVal[1]
        }
        outPara[ekey] = eval
      }
    }

    if (value != undefined) {
      outPara[key] = value
    } else {
      delete outPara[key]
    }
    parameters = []
    for (var k in outPara) {
      parameters.push(k + '=' + outPara[k])
    }

    var finalUrl = baseUrl

    if (parameters.length > 0) {
      finalUrl += '?' + parameters.join('&')
    }

    return finalUrl
  }

}(jQuery))
